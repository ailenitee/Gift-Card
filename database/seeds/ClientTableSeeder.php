<?php

use Illuminate\Database\Seeder;
use App\Client;
class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
        [
          'code'			     	=> 'max',
          'name'			     	=> 'Max Restaurants',
          'bot_name'				=> 'MaxGiftCards',
          'priority'				=> null,
          'access_token'		=> 'EAAd94lII0KcBAGZC3T1Avu8FvdZCFfXqV3Kw81ZB2erRGZA7NmWStuIUYCMCdZCLZAzuVR4tNh7pTmZAPx9YVWZCnwkDieO6VTLQwnNXEAYVEkrgZBmrWQHzmZAMvblysCJTnihFXaQnUJHZAhoiPX0tkPOEj5FEtxBugbgKxOlRuJoAfpf8oJK2YI7',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'sm',
          'name'			     	=> 'SM',
          'bot_name'				=> 'SMGiftCardsBot',
          'priority'				=> '["SM","SM Cinema","SM Supermarket","Watson\'s"]',
          'access_token'		=> 'EAACdkvNXe6cBANl7Bl6TUkzvPJZBVxlHbZAUqyooZCi3EmFQrxfqRMbZBFC0L8tkvE4gDpno4ZAp5T8G7zwDAnZBztjypUDLFXObB7j3Q17GHqXokhYlSSwNCtO51D5gAwTQBc9xiNSLypM0yqbABXsdLQT5YXU6evzoCj8MJPuZBPO1MMqPd6X',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'purefoods-ham',
          'name'			     	=> 'Purefoods',
          'bot_name'				=> 'PurefoodsHamRedemption',
          'priority'				=> null,
          'access_token'		=> 'EAAEVe3ZASPwABAPzpjK1ZAoyOxEUk4nwu8QIcTywFFoArKJCiH7BxY4fuvLqNNAAFxwB2sl5JMZBKQlywQnpUzvgbtOOquUwEpoHwZAbLI5aTGcDUbAF97611xAfum5b2m2f7YlwoaXrfLJXn1SpZAGcoAFUG7P7qcQaLj4y5iBRgN7VjMLJX',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'mercury',
          'name'			     	=> 'Mercury Drug Store',
          'bot_name'				=> 'MercuryGiftCards',
          'priority'				=> null,
          'access_token'		=> 'EAAYE0ZAAwZAZBUBAHflqStDmB0ZBODx0ABWo2Io0M0ZCc32ThYHaRYqNIXcGfzrDZABUC1npwDBnzdAo78BaIZCoSyZBzKrS3BMg3uW9hB0VV1yV1KGgje977TPBUeOv2UXVRibH46jzLK7wQh3Nfo92JdWWHxfrCav6UWRU510D26g3eE7QdMBP',
          'physical'				=> true,
        ],
        [
          'code'			     	=> 'national',
          'name'			     	=> 'National Bookstore',
          'bot_name'				=> 'NBSGiftCards',
          'priority'				=> null,
          'access_token'		=> 'EAAETLgZCxk4YBABnwDbB59Y2W9OeoWbVpKa1SWhMidNVV9BJLoaxPsoeUAY5rUTvoqbHhCP5JRty2M439Ip4KO4XI6VmJpU0SBry1mjVoorHcI9V33LNCAHJVx1oawg9YbdsR0H0ceqIRTq9jHVtKr4mmxKkwZAeOEhVrwrDs3gxTHrgqQ',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'swatch',
          'name'			     	=> 'Swatch',
          'bot_name'				=> 'SwatchGiftCards',
          'priority'				=> null,
          'access_token'		=> 'EAAQhIArK1LMBANThviZBn72r6EpZB5iu0ZCJfXzOgqZAiMHCk284uP4kysYZCaNAskXfQFm944VbT8F6D11UYwEwLdQi2ZCAY8l1kykZBRiKj3QsZBtmZB9VxHgKrIgLpn90Ch2zUe3yNzExrPx4C5jZBBExA3witXuEUekMUxGpmtk07UQvb8kkoL',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'greenwich',
          'name'			     	=> 'Greenwich',
          'bot_name'				=> 'GreenwichGiftCards',
          'priority'				=> null,
          'access_token'		=> 'EAAGtbZAGlYmIBACpTxeYgTtsPqhrvlaGiIO2CbqZAwMSlbLx2BsUYuLdz5RPof9v2z6durXEaRB1jH0ZADshs8KnRc9KHz2Yh7cZAkBCZCjIhWUNokT2e0TXcIniB1RjGp1uRlP7XSU0qK6egFU7mogPxRgckWl7zW8XQJbjDUy8xLIZBZAu997',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'jollibee',
          'name'			     	=> 'Jollibee',
          'bot_name'				=> 'JolliGiftCards',
          'priority'				=> null,
          'access_token'		=> 'EAAKljkejAZAUBAFVsz3d2NOfslZAn5RaoTACiZBenyt9Vqcs9mWEzCCw9nLv1pfwArEN5XEEeKCXkGs4i2NLISjYCCYJxeh658QJ2OTCzE5aetdhjfaZAozT6gMc7kaIHp97FV2ZCokbOeosrayd36lRx49frAxNXwPCjpDZCKu6Ogd3UFileC',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'robinsons',
          'name'			     	=> "Robinson's",
          'bot_name'				=> 'RobinsonsGiftCards',
          'priority'				=> '["Robinsons Supermarket","Robinsons Appliances","Robinsons Department Store","Robinsons Movie World","Handyman","Toys R Us"]',
          'access_token'		=> 'EAAEKZAOnA5DQBAPQWnFiLoCeuc1bqq4B9TbIjbvdmR3Uyh67ShroBZBZBRyZAHmsCZCMdxMUZCjK1ZB9w0ctZAzsvFDbztP6r72UW6t4DoJk6V7izrlZC5yiJzp1lRVLVTSV0q8xhgZCNbfAl5xfNHVQg2DrR8ZC9MZAi0LzTdhYvZBCQIMPipQwVJkmm',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'sushinori',
          'name'			     	=> 'Sushi Nori',
          'bot_name'				=> 'SushiNoriRedemption',
          'priority'				=> null,
          'access_token'		=> 'EAAGHf6lHvZCABAG9kCCNAi0or02MO7IkLQGHrUS9JAwqDPrZCjhAm3095SCSzIzAUsQ2KmyWe2pCg0MSZAmL08YY6EDhEQnxXQjfYnqz7nYEgm82DJzZAWDMmG34rsbzIQ7nDn02xJV0YtvZCKvEUcWN5b8giZAXJiL9fgZBbBxVr50XH9G7v74',
          'physical'				=> false,
        ],
        [
          'code'			     	=> 'burgerking',
          'name'			     	=> 'Burger King',
          'bot_name'				=> 'BurgerKingRedemption',
          'priority'				=> null,
          'access_token'		=> 'EAAQBrmj6zVUBADJAdRInaHSqZAlFpLx49pzAjjLnyydBaRGZARS27MYMHsHXXhZCZCBihStUdN7GlcumAn24u4qkqYgQE9n3h3KFEaFXrtyzGARaszZBnCkZAuSbBcZA1PSsR6ZC5t4E7ovSWoZBu1p7ZB14hd02PHoYS20Uip6Vz0PZA7jnsPRihn2',
          'physical'				=> false,
        ],
      ];
      foreach ($data as $key)
      {
        Client::create([
          'code'            => $key['code'],
          'name'            => $key['name'],
          'bot_name'        => $key['bot_name'],
          'priority'        => $key['priority'],
          'access_token'    => $key['access_token'],
          'physical'        => $key['physical']
        ]);
      }
    }
}
