const Discord = require('discord.js');
const client = new Discord.Client();
require('dotenv').config();

client.once('ready', () => {
    console.log('Ready');
});

client.login(process.env.DISCORD_BOT_TOKEN);

client.on('message', (message) => {
});
