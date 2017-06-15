<?php
class AddDescriptionColumnToProjects extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
    public $description = 'add_description_column_to_projects';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
    public $migration = array(
        'up' => array(
        ),
        'down' => array(
        ),
    );

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
    public function before($direction) {
        return true;
    }

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
    public function after($direction) {
        return true;
    }
}
