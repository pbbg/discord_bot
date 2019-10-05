module.exports = {
    name: 'snowflake',
    description: 'Get snowflake from user',
    usage: '[@mention]',
    cooldown: 0,
    ownerOnly: true,
    dmOnly: false,
    execute(message, args, knex, client) {
        const snowflakes = message.mentions.users.map(el => {
            return el.id;
        }).join(' ');

        message.channel.send(`Snowflake for user '${args}': ${snowflakes}`)
    }
};