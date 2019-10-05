
exports.up = function(knex) {
  return knex.schema.createTable('users', (table) => {
      table.increments('id');
      table.bigInteger('snowflake');
      table.string('username');
      table.timestamps(false, true);
  })
};

exports.down = function(knex) {
  return knex.schema.dropTableIfExists('users')
};
