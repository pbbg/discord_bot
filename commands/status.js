module.exports = {
    name: 'status',
    description: 'Sets the bot status',
    usage: '[status]',
    cooldown: 0,
    ownerOnly: true,
    dmOnly: true,
    execute(message, args, knex, client) {
        const status = args.join(' ');
        message.client.user.setActivity(status);
        message.channel.send(`Status set to  ${status}`);
    }
};