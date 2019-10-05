const Discord = require('discord.js');
const fs = require('fs');
const client = new Discord.Client();

// Set up environment variables instead of config.json...
require('dotenv').config();

var knex = require('knex')({
    client: 'mysql',
    connection: {
        host: process.env.DATABASE_HOST,
        user: process.env.DATABASE_USER,
        password: process.env.DATABASE_PASSWORD,
        database: process.env.DATABASE_DATABASE,
    }
});

client.commands = new Discord.Collection();

const commandsFiles = fs.readdirSync('./commands').filter(
    file => file.endsWith('.js')
);

for (const file of commandsFiles) {
    const command = require(`./commands/${file}`);
    client.commands.set(command.name, command);
    console.log(`Loaded command ${command.name}`)
}

const botOwners = process.env.BOT_OWNERS.split(','),
    prefix = process.env.COMMAND_PREFIX;

client.once('ready', () => {
    console.log('Ready');
});

client.on('message', (message) => {

    if (message.channel.type === 'text') {
        knex('messages')
            .insert({
                snowflake: message.author.id,
                username: message.author.username,
                messageId: message.id,
                message: message.content,
                channel: message.channel.name,
                type: 'initial',
            })
            .then(res => {
                console.log(res);
            })
            .catch(err => {
                console.error(err);
            });
    }

    if (!message.content.startsWith(prefix) || message.author.bot) return;

    const args = message.content.slice(prefix.length).split(/ +/);
    const commandName = args.shift().toLowerCase();

    const command = client.commands.get(commandName)
        || client.commands.find(cmd => cmd.aliases && cmd.aliases.includes(commandName));

    if (!command) return;

    if (command.guildOnly && message.channel.type !== 'text') {
        return message.reply('I can\'t execute that command inside DMs!');
    }

    if (command.ownerOnly && !botOwners.includes(message.author.id)) {
        return message.reply('This command can only be used by the bot owner(s)');
    }

    if (command.args && !args.length) {
        let reply = `You didn't provide any arguments, ${message.author}!`;

        if (command.usage) {
            reply += `\nThe proper usage would be: \`${prefix}${command.name} ${command.usage}\``;
        }

        return message.channel.send(reply);
    }

    try {
        command.execute(message, args, knex, client);
    } catch (error) {
        message.reply('there was an error trying to execute that command!');
    }
});

client.on('messageUpdate', (oldMessage, newMessage) => {

    if (newMessage.channel.type !== 'text') return;

    knex('messages')
        .insert({
            snowflake: newMessage.author.id,
            username: newMessage.author.username,
            messageId: newMessage.id,
            message: newMessage.content,
            channel: newMessage.channel.name,
            type: 'edit',
        })
        .then(res => {});
});

client.on('messageDelete', (message) => {

    if (message.channel.type !== 'text') return;

    knex('messages')
        .insert({
            snowflake: message.author.id,
            username: message.author.username,
            messageId: message.id,
            message: message.content,
            channel: message.channel.name,
            type: 'edit',
        })
        .then(res => {});
});

client.login(process.env.DISCORD_BOT_TOKEN);