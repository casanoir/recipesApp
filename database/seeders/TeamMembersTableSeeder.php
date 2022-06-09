<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamMember::truncate();

        $teamMembers=[
            // ali
            ['firstName'=>'Ali',
            'lastName'=>'El Baz',
            'ImgUrl'=>'https://media-exp1.licdn.com/dms/image/C4E03AQGlbMGpRa-vFA/profile-displayphoto-shrink_200_200/0/1640533440722?e=1659571200&v=beta&t=gLTVn6vQ95SWyvDG1u7V6nMh12ouJ0u-fgd6-7nU0Ko',
            'profileUrl'=>'ali-el-baz-827a9b172',
            'description'=>'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat,'],

            // berre
            ['firstName'=>'Berre',
            'lastName'=>'Vandendorpe',
            'ImgUrl'=>'https://media-exp1.licdn.com/dms/image/C4E03AQF7nTtvMWR9nA/profile-displayphoto-shrink_200_200/0/1638176785211?e=1659571200&v=beta&t=_wDqljIQNU_5YGTPlPLEmVu9_6VbneV5ywFM7j99lNU',
            'profileUrl'=>'berre-vandendorpe-14a328227',
            'description'=>'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat,'],
          
            // abdo
            ['firstName'=>'Abderahmane',
            'lastName'=>'Mendoun',
            'ImgUrl'=>'https://media-exp1.licdn.com/dms/image/C4E03AQGSK6W60lQFSA/profile-displayphoto-shrink_200_200/0/1653044300776?e=1659571200&v=beta&t=mFa00vj7ll4K-BRGsCYlFRQL_o0LxS5vMi7CdCRey_4',
            'profileUrl'=>'abderrahmane-mendoun-920421223',
            'description'=>'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat,'],
        ];
        TeamMember::insert($teamMembers);
    }
}
