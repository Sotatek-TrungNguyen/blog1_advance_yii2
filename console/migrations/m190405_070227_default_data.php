<?php

use yii\db\Migration;
/**
 * Class m190405_070227_default_data
 */
class m190405_070227_default_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this-> insert('{{%director}}',[
            'id'=>1,
            'name'=>'firstdirector' 
        ]);

        $this-> insert('{{%category}}',[   
            'id'=>1,
            'title'=>'comedy'
        ]);

        $this-> insert('{{%movie}}',[
            'id' =>1,
            'category_id'=>1,
            'director_id'=>1,
            'name'=>'comedy_movie_1',
            'content'=>'its a comedy movie'
        ]);

        $connection = Yii::$app->db;
        $command=$connection->createCommand(
            'INSERT INTO category (id,title)
            VALUE (2,"horror");
            INSERT INTO category (id,title)
            VALUE (3,"drama");
            INSERT INTO category (id,title)
            VALUE (4,"adventure");
            INSERT INTO director (id,name)
            VALUE (2,"seconddirector");
            INSERT INTO director (id,name)
            VALUE (3,"thirddir");
            INSERT INTO director (id,name)
            VALUE (4,"fourthdir");
            INSERT INTO director (name)
            VALUE ("fifthdirector");
            INSERT INTO movie (id,category_id,director_id,name,content)
            VALUE (2,1,1,"second movie","this is content of second movie"),
            (3,1,1,"3rd movie","this is content of third movie"),
            (4,3,2,"4rd movie","this is content of fourth movie"),
            (5,2,3,"5th movie","this is content of fifth movie"),
            (6,1,3,"6th movie","this is content of sixth movie");'
        );
        $command-> execute();
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190405_070227_default_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190405_070227_default_data cannot be reverted.\n";

        return false;
    }
    */
}
