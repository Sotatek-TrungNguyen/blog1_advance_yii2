<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%movies}}`.
 */
class m190402_095527_create_movies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%movie}}', [
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer()->defaultValue(1),
            'director_id'=>$this->integer(),
            'name'=>$this->string()->notNull()->unique(),
            'content'=>$this->text()->notNull(),
            'update_at' => $this->timestamp()->notNull(),
            'create_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),

        ]);

        $this->createTable('{{%director}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->unique(),
        ]);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->unique(),
        ]);

        $this->createIndex(
            'idx-movie-director_id',
            'movie',
            'director_id'
        );

        $this->createIndex(
            'idx-movie-category_id',
            'movie',
            'category_id'
        );

        $this->addForeignKey(
            'fk-movie-category_id',
            'movie',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

         $this->addForeignKey(
            'fk-movie-director_id',
            'movie',
            'director_id',
            'director',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%movie}}');
        $this->dropIndex(
            'idx-movie-director_id',
            'movie'
        );

        $this->dropIndex(
            'idx-movie-category_id',
            'movie'
        );

        $this->dropForeignKey(
            'fk-movie-category_id',
            'movie'
        );

         $this->dropForeignKey(
            'fk-movie-director_id',
            'movie'
        );
    }
}
