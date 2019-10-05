exports.up = function (knex) {
    return knex.schema
        .createTable('messages', function (table) {
            table.increments('id');
            table.bigInteger('snowflake').unsigned();
            table.string('username');
            table.bigInteger('messageId');
            table.text('message');
            table.bigInteger('parent_id');
            table.string('channel');
            table.string('type');
            table.timestamps(false, true);
        })
};

exports.down = function (knex) {
    return knex.schema.dropTable('messages');
};
