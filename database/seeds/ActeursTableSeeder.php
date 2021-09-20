<?php

use Illuminate\Database\Seeder;

class ActeursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('acteurs')->delete();
        
        \DB::table('acteurs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom_act' => 'EBOA',
                'prenom_act' => 'Julie',
                'tel_act' => 694079588,
                'email_act' => 'julieeboa7@gmail.com',
                'pseudo' => 'Admin@',
                'mot_passe' => Hash::make('julie123'),
                'role' => 'Administrateur',
            ),

            1 => 
            array (
                'id' => 2,
                'nom_act' => 'AKEVA',
                'prenom_act' => 'Godwin',
                'tel_act' => 694079588,
                'email_act' => 'gwin7@gmail.com',
                'pseudo' => 'Gwin@',
                'mot_passe' => Hash::make('user123'),
                'role' => 'Utilisateur',
            ),
            
        ));
        
        
    }
}