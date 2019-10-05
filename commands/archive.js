module.exports = {
    name: 'archive',
    description: 'Search the archive',
    usage: '[status]',
    cooldown: 0,
    ownerOnly: true,
    dmOnly: false,
    execute(message, args, knex, client) {
        message.channel.send(`Finding archives from user ${args}`);
    }
};