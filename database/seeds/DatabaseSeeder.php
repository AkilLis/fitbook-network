<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model;
use App\Role;
use App\AwardAccount;
use App\BonusAccount;
use App\CashAccount;
use App\UsageAccount;
use App\SavingAccount;
use App\UserAccountMap;
use App\Block;
use App\UserBlockMap;
use App\GroupRankConfig;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      
      /*
        $users = array(
                ['id' => 1, 'userId' => 'AA00001', 'fName' => 'Хулангоо','lName' => 'Амарсанаа','email' => 'hulangoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 2, 'userId' => 'AA00002', 'fName' => 'Tuvshoo','lName' => 'Амарсанаа','email' => 'tuvshoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 3, 'userId' => 'AA00003', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo1.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 4, 'userId' => 'AA00004', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo2.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 5, 'userId' => 'AA00005', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo3.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 6, 'userId' => 'AA00006', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo4.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 7, 'userId' => 'AA00007', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo5.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
        );

       foreach($users as $user){
                User::create($user); 
           }
           */
      /*$blockA = array(
                'id' => 1, 'parentId' => 0, 'groupId' => 1, 'userCount' => 0, 'isActive' => 'Y', 'U1' => 1, 'U2' => 2, 'U3' => 3, 'U4' => 4, 'U5' => 5, 'U6' => 6 , 'U7' => 7
      ); 

      Block::create($blockA);

      for($i = 1; $i < 8; $i ++)
      {
          $awardAccount = array(
                'id' => $i * 5 + 1, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $bonusAccount = array(
                'id' => $i * 5 + 2, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $cashAccount = array(
                'id' => $i * 5 + 3, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $usageAccount = array(
                'id' => $i * 5 + 4, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $savingAccount = array(
                'id' => $i * 5 + 5, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $maps = array(
                ['userId' => $i, 'type' => 1,'accountId' => $i * 5 + 1,'groupId' => 1],
                ['userId' => $i, 'type' => 2,'accountId' => $i * 5 + 2,'groupId' => 1],
                ['userId' => $i, 'type' => 3,'accountId' => $i * 5 + 3,'groupId' => 1],
                ['userId' => $i, 'type' => 4,'accountId' => $i * 5 + 4,'groupId' => 1],
                ['userId' => $i, 'type' => 5,'accountId' => $i * 5 + 5,'groupId' => 1],
            );

           AwardAccount::create($awardAccount);
           BonusAccount::create($bonusAccount);
           CashAccount::create($cashAccount);
           UsageAccount::create($usageAccount);
           SavingAccount::create($savingAccount);

           foreach($maps as $map){
                UserAccountMap::create($map); 
           }
      }

      $blockMaps = array(['userId' => 1, 'parentId' => 0, 'sortedOrder' => '1','blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 2, 'parentId' => 0, 'blockId' => 1, 'sortedOrder' => '2', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 3, 'parentId' => 0, 'blockId' => 1, 'sortedOrder' => '3', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 4, 'parentId' => 0, 'blockId' => 1, 'sortedOrder' => '4', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 5, 'parentId' => 0, 'blockId' => 1, 'sortedOrder' => '5','fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 6, 'parentId' => 0, 'blockId' => 1, 'sortedOrder' => '6', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 7, 'parentId' => 0, 'blockId' => 1, 'sortedOrder' => '7', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
        );

       foreach($blockMaps as $map){
                UserBlockMap::create($map); 
        }*/
      /* */
      /*$users = array(
        for($i = 500; $i < 900; $i ++)
        {
          ['id' => $i, 'userId' => 'AA0000'+$i, 'fName' => $i,'lName' => 'l'+$i,'email' => $i+'@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
            User::create($user); 
        } */

      /*for($i = 500; $i < 2000; $i ++)
      {
        $newUser = array('id' => $i, 'userId' => $i, 'fName' => $i,'lName' => 'l'+$i,'email' => $i+'@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'N');
        User::create($newUser);
      }*/

      $users = array(
                ['id' => 70, 'userId' => 'lag1', 'fName' => 'flexgym14','lName' => 'flexgym14','email' => 'hulangoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 71, 'userId' => 'lag2', 'fName' => 'flexgym15','lName' => 'flexgym15','email' => 'tuvshoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 72, 'userId' => 'lag3', 'fName' => 'flexgym16','lName' => 'flexgym16','email' => 'puujee@yahoo1.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 73, 'userId' => 'lag4', 'fName' => 'flexgym17','lName' => 'flexgym17','email' => 'puujee@yahoo2.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 74, 'userId' => 'lag5', 'fName' => 'flexgym18','lName' => 'flexgym18','email' => 'puujee@yahoo3.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 75, 'userId' => 'lag6', 'fName' => 'flexgym19','lName' => 'flexgym19','email' => 'puujee@yahoo4.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 76, 'userId' => 'lag7', 'fName' => 'flexgym20','lName' => 'flexgym20','email' => 'puujee@yahoo5.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 77, 'userId' => 'la8', 'fName' => 'flexgym20','lName' => 'flexgym20','email' => 'puujee@yahoo5.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 78, 'userId' => 'lag9', 'fName' => 'flexgym20','lName' => 'flexgym20','email' => 'puujee@yahoo5.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
                ['id' => 79, 'userId' => 'lag0', 'fName' => 'flexgym20','lName' => 'flexgym20','email' => 'puujee@yahoo5.com','password' => \Hash::make('123'),'isNetwork' => 'N'],
        );

       foreach($users as $user){
                User::create($user); 
           }

      /*$blockA = array(
                'id' => 3, 'parentId' => 0, 'groupId' => 3, 'userCount' => 0, 'isActive' => 'Y', 'U1' => 100, 'U2' => 101, 'U3' => 102, 'U4' => 103, 'U5' => 104, 'U6' => 105 , 'U7' => 106
      ); 
      Block::create($blockA);     

      for($i = 100; $i < 107; $i ++)
      {
          $awardAccount = array(
                'id' => $i * 5 + 1, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $bonusAccount = array(
                'id' => $i * 5 + 2, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $cashAccount = array(
                'id' => $i * 5 + 3, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $usageAccount = array(
                'id' => $i * 5 + 4, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $savingAccount = array(
                'id' => $i * 5 + 5, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $maps = array(
                ['userId' => $i, 'type' => 1,'accountId' => $i * 5 + 1,'groupId' => 1],
                ['userId' => $i, 'type' => 2,'accountId' => $i * 5 + 2,'groupId' => 1],
                ['userId' => $i, 'type' => 3,'accountId' => $i * 5 + 3,'groupId' => 1],
                ['userId' => $i, 'type' => 4,'accountId' => $i * 5 + 4,'groupId' => 1],
                ['userId' => $i, 'type' => 5,'accountId' => $i * 5 + 5,'groupId' => 1],
            );

           AwardAccount::create($awardAccount);
           BonusAccount::create($bonusAccount);
           CashAccount::create($cashAccount);
           UsageAccount::create($usageAccount);
           SavingAccount::create($savingAccount);

           foreach($maps as $map){
                UserAccountMap::create($map); 
           }
      }

      $blockMaps = array(['userId' => 100, 'parentId' => 200, 'sortedOrder' => '100','blockId' => 3, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 1],
            ['userId' => 101, 'parentId' => 200, 'blockId' => 3, 'sortedOrder' => '101', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 2],
            ['userId' => 102, 'parentId' => 200, 'blockId' => 3, 'sortedOrder' => '102', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 3],
            ['userId' => 103, 'parentId' => 200, 'blockId' => 3, 'sortedOrder' => '103', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 4],
            ['userId' => 104, 'parentId' => 200, 'blockId' => 3, 'sortedOrder' => '104','fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 5],
            ['userId' => 105, 'parentId' => 200, 'blockId' => 3, 'sortedOrder' => '105', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 6],
            ['userId' => 106, 'parentId' => 200, 'blockId' => 3, 'sortedOrder' => '106', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 7],
        );

       foreach($blockMaps as $map){
                UserBlockMap::create($map); 
        }*/


    /*$blockA = array(
                'id' => 2, 'parentId' => 0, 'groupId' => 2, 'userCount' => 0, 'isActive' => 'Y', 'U1' => 207, 'U2' => 208, 'U3' => 209, 'U4' => 210, 'U5' => 211, 'U6' => 212 , 'U7' => 213
      );  

      Block::create($blockA);  


      for($i = 207; $i < 214; $i ++)
      {
          $awardAccount = array(
                'id' => $i * 5 + 1, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $bonusAccount = array(
                'id' => $i * 5 + 2, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $cashAccount = array(
                'id' => $i * 5 + 3, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $usageAccount = array(
                'id' => $i * 5 + 4, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $savingAccount = array(
                'id' => $i * 5 + 5, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $maps = array(
                ['userId' => $i, 'type' => 1,'accountId' => $i * 5 + 1,'groupId' => 2],
                ['userId' => $i, 'type' => 2,'accountId' => $i * 5 + 2,'groupId' => 2],
                ['userId' => $i, 'type' => 3,'accountId' => $i * 5 + 3,'groupId' => 2],
                ['userId' => $i, 'type' => 4,'accountId' => $i * 5 + 4,'groupId' => 2],
                ['userId' => $i, 'type' => 5,'accountId' => $i * 5 + 5,'groupId' => 2],
            );

           AwardAccount::create($awardAccount);
           BonusAccount::create($bonusAccount);
           CashAccount::create($cashAccount);
           UsageAccount::create($usageAccount);
           SavingAccount::create($savingAccount);

           foreach($maps as $map){
                UserAccountMap::create($map); 
           }
      }

      $blockMaps = array(['userId' => 207, 'parentId' => 0, 'sortedOrder' => '8','blockId' => 2, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 1],
            ['userId' => 208, 'parentId' => 0, 'blockId' => 2, 'sortedOrder' => '9', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 2],
            ['userId' => 209, 'parentId' => 0, 'blockId' => 2, 'sortedOrder' => '10', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 3],
            ['userId' => 210, 'parentId' => 0, 'blockId' => 2, 'sortedOrder' => '11', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 4],
            ['userId' => 211, 'parentId' => 0, 'blockId' => 2, 'sortedOrder' => '12','fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 5],
            ['userId' => 212, 'parentId' => 0, 'blockId' => 2, 'sortedOrder' => '13', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 6],
            ['userId' => 213, 'parentId' => 0, 'blockId' => 2, 'sortedOrder' => '14', 'fCount' => 0, 'mCount' => 0, 'rankId' => 1, 'viewOrder' => 7],
        );

       foreach($blockMaps as $map){
                UserBlockMap::create($map); 
        }*/



       /* $groupConfig = array(
            ['rankId' => 1, 'groupId' => 1, 'zeroAmount' => 0, 'oneAmount' => 5000, 'twoAmount' => 7000, 'isCapAmount' => 24000, 'capUpperAmount' => 144000 ,'UpperAmount' => 276000, 'firstLevel' => 1, 'secondLevel' => 2, 'thirdLevel' => 3],
            ['rankId' => 1, 'groupId' => 2, 'zeroAmount' => 14500, 'oneAmount' => 19000, 'twoAmount' => 24000, 'isCapAmount' => 200000, 'capUpperAmount' => 1370000 ,'UpperAmount' => 2800000, 'firstLevel' => 1, 'secondLevel' => 2, 'thirdLevel' => 3],
            ['rankId' => 1, 'groupId' => 3, 'zeroAmount' => 70000, 'oneAmount' => 135000, 'twoAmount' => 215000, 'isCapAmount' => 2000000, 'capUpperAmount' => 13700000 ,'UpperAmount' => 28000000, 'firstLevel' => 1, 'secondLevel' => 2, 'thirdLevel' => 3],
            ['rankId' => 2, 'groupId' => 1, 'zeroAmount' => 0, 'oneAmount' => 12000, 'twoAmount' => 19500, 'isCapAmount' => 75000, 'capUpperAmount' => 500000 ,'UpperAmount' => 1000000, 'firstLevel' => 1, 'secondLevel' => 2, 'thirdLevel' => 3],
            ['rankId' => 2, 'groupId' => 2, 'zeroAmount' => 50000, 'oneAmount' => 75000, 'twoAmount' => 100000, 'isCapAmount' => 750000, 'capUpperAmount' => 5000000 ,'UpperAmount' => 10000000, 'firstLevel' => 1, 'secondLevel' => 2, 'thirdLevel' => 3],
            ['rankId' => 2, 'groupId' => 3, 'zeroAmount' => 250000, 'oneAmount' => 500000, 'twoAmount' => 750000, 'isCapAmount' => 7500000, 'capUpperAmount' => 15000000 ,'UpperAmount' => 50000000, 'firstLevel' => 1, 'secondLevel' => 2, 'thirdLevel' => 3],
            );

        foreach($groupConfig as $map){
                GroupRankConfig::create($map); 
        }*/
        /*$blockMaps = array(['userId' => 110, 'parentId' => 0, 'blockId' => 1, 'fCount' => 1, 'mCount' => 1, 'rankId' => 1],
            ['userId' => 111, 'parentId' => 0, 'blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 112, 'parentId' => 0, 'blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 113, 'parentId' => 0, 'blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 114, 'parentId' => 0, 'blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 115, 'parentId' => 0, 'blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
            ['userId' => 116, 'parentId' => 0, 'blockId' => 1, 'fCount' => 0, 'mCount' => 0, 'rankId' => 1],
        );

        foreach($blockMaps as $map){
                UserBlockMap::create($map); 
        }*/


        /*$blockA = array(
                'parentId' => 0, 'groupId' => 2, 'userCount' => 0, 'isActive' => 'Y', 'U1' => 150, 'U2' => 151, 'U3' => 152, 'U4' => 153, 'U5' => 154, 'U6' => 155 , 'U7' => 156
            );

        Block::create($blockA);*/
        /*for($i = 0; $i < 200; $i ++)
        {
           $awardAccount = array(
                'id' => $i, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $bonusAccount = array(
                'id' => $i, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $cashAccount = array(
                'id' => $i, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $usageAccount = array(
                'id' => $i, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $savingAccount = array(
                'id' => $i, 'accountId' => '976', 'nameL' => 'Шагнал', 'nameF' => 'Шагнал', 'endAmount' => 0, 'created_at' => '2016-05-07 00:00:12'
            );

           $maps = array(
                ['userId' => 100 + $i, 'type' => 1,'accountId' => $i,'groupId' => 1],
                ['userId' => 100 + $i, 'type' => 2,'accountId' => $i,'groupId' => 1],
                ['userId' => 100 + $i, 'type' => 3,'accountId' => $i,'groupId' => 1],
                ['userId' => 100 + $i, 'type' => 4,'accountId' => $i,'groupId' => 1],
                ['userId' => 100 + $i, 'type' => 5,'accountId' => $i,'groupId' => 1],
            );

           AwardAccount::create($awardAccount);
           BonusAccount::create($bonusAccount);
           CashAccount::create($cashAccount);
           UsageAccount::create($usageAccount);
           SavingAccount::create($savingAccount);

           foreach($maps as $map){
                UserAccountMap::create($map); 
           }
        }*/

        
           // $users = array(
           //      'id' => 100 + $i, 'userId' => 'BB0000' + $i, 'fName' => 'user' + $i,'lName' => 'user','email' => $i+'user@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'); 

           //  User::create($users);        

        /*$user = User::find('3');
        $admin = Role::find('1');
        $user->attachRole($admin);*/

        // $this->call(UsersTableSeeder::class);
       /*$users = array(
                ['id' => 1, 'userId' => 'AA00001', 'fName' => 'Хулангоо','lName' => 'Амарсанаа','email' => 'hulangoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 2, 'userId' => 'AA00002', 'fName' => 'Tuvshoo','lName' => 'Амарсанаа','email' => 'tuvshoo@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
                ['id' => 3, 'userId' => 'AA00003', 'fName' => 'Puujee','lName' => 'Амарсанаа','email' => 'puujee@yahoo.com','password' => \Hash::make('123'),'isNetwork' => 'Y'],
        );*/
            
        

    }
}
