const Discord = require('discord.js');
const fs = require('fs');
const client = new Discord.Client();

client.commands = new Discord.Collection();

const commandsFiles = fs.readdirSync('./commands').filter(
    file => file.endsWith('.js')
);

for (const file of commandsFiles) {
    const command = require(`./commands/${file}`);
    client.commands.set(command.name, command);
    console.log(`Loaded command ${command.name}`)
}

// Set up environment variables instead of config.json...
require('dotenv').config();

const botOwners = process.env.BOT_OWNERS.split(','),
    prefix = process.env.COMMAND_PREFIX;

client.once('ready', () => {
    console.log('Ready');
});

client.on('message', (message) => {

    if (!message.content.startsWith(prefix) || message.author.bot) return;

    const args = message.content.slice(prefix.length).split(/ +/);
    const commandName = args.shift().toLowerCase();

    const command = client.commands.get(commandName)
        || client.commands.find(cmd => cmd.aliases && cmd.aliases.includes(commandName));


    if(!command) return;

    if (command.guildOnly && message.channel.type !== 'text') {
        return message.reply('I can\'t execute that command inside DMs!');
    }

    if(command.ownerOnly && !botOwners.includes(message.author.id)) {
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
        command.execute(message, args);
    } catch (error) {
        console.error(error);
        message.reply('there was an error trying to execute that command!');
    }
});

client.login(process.env.DISCORD_BOT_TOKEN);