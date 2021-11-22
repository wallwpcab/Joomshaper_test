




<!-- dashboard.php -->
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>




<!-- <!DOCTYPE html> -->
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <!-- <p><a href="logout.php">Logout</a></p> -->
    </div>
</body>
</html>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
<!-- dashboard.php -->
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>













<?php
require __DIR__ .'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;

// //INSERT 
 DB::table('register') ->insert([
    "name" => 'Tonmoy',
    "email" => 'tonmoy@gmail.com',
    "created_at" => date("Y-m-d h:i:s")
]);

$users = DB::table('register')->first();
$users = DB::table('register')->get(); 

$users = DB::table('register')
            ->select('name', 'email as user_email')
            ->get();

$users = DB::table('users')->distinct()->get(); //table name should be register

$users = DB::table('users') // table name should be register
             ->select(DB::raw('count(*) as user_count, status'))
             ->where('status', '<>', 1)
             ->groupBy('status')
              ->get(); 

$orders = DB::table('orders')
                ->selectRaw('price * ? as price_with_tax', [1.0825])
                ->get();


foreach ($result as $key => $value) {
    echo $value->name. '<br/>';
}

var_dump($users);



DB::table('users')->where('active', false)
    ->chunkById(100, function ($users) {
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['active' => true]);
        }
    });



    $users = DB::table('users')
                ->where('votes', '>=', 100)
                ->get();

    $users = DB::table('users')
                ->where('votes', '<>', 100)
                ->get();

    $users = DB::table('users')
                ->where('name', 'like', 'T%')
                ->get();

    
    $users = DB::table('users')
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('orders')
                     ->whereColumn('orders.user_id', 'users.id');
           })
           ->get();



           $users = User::where(function ($query) {
           $query->select('type')
                ->from('membership')
                ->whereColumn('membership.user_id', 'users.id')
                ->orderByDesc('membership.start_date')
                ->limit(1);
                }, 'Pro')->get();




           DB::table('users')->where('active', false)
                 ->lazyById()->each(function ($user) {
                 DB::table('users')
                 ->where('id', $user->id)
                 ->update(['active' => true]);
           });

           
           use Illuminate\Support\Facades\DB;
                  $users = DB::table('users')->count();
                  $price = DB::table('orders')->max('price');

           $users = DB::table('users')
                  ->select('name', 'email as user_email')
                  ->get();

           $users = DB::table('users')
             ->select(DB::raw('count(*) as user_count, status'))
             ->where('status', '<>', 1)
             ->groupBy('status')
             ->get();


           $orders = DB::table('orders')
                ->selectRaw('price * ? as price_with_tax', [1.0825])
                ->get();

           $orders = DB::table('orders')
                ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
                ->get();

            
           $orders = DB::table('orders')
                ->select('department', DB::raw('SUM(price) as total_sales'))
                ->groupBy('department')
                ->havingRaw('SUM(price) > ?', [2500])
                ->get();

           $orders = DB::table('orders')
                ->orderByRaw('updated_at - created_at DESC')
                ->get();

           $orders = DB::table('orders')
                ->orderByRaw('updated_at - created_at DESC')
                ->get();

           $orders = DB::table('orders')
                ->select('city', 'state')
                ->groupByRaw('city, state')
                ->get();

           use Illuminate\Support\Facades\DB;

           $users = DB::table('users')
                ->join('contacts', 'users.id', '=', 'contacts.user_id')
                ->join('orders', 'users.id', '=', 'orders.user_id')
                ->select('users.*', 'contacts.phone', 'orders.price')
                ->get();

           $users = DB::table('users')
                ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                ->get();

           $users = DB::table('users')
                ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
                ->get();

           $sizes = DB::table('sizes')
                ->crossJoin('colors')
                ->get();

           DB::table('users')
               ->join('contacts', function ($join) {
               $join->on('users.id', '=', 'contacts.user_id')->orOn(...);
            })
            ->get();


           DB::table('users')
               ->join('contacts', function ($join) {
               $join->on('users.id', '=', 'contacts.user_id')
                 ->where('contacts.user_id', '>', 5);
           })
           ->get();


           $latestPosts = DB::table('posts')
                   ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
                   ->where('is_published', true)
                   ->groupBy('user_id');

           $users = DB::table('users')
                  ->joinSub($latestPosts, 'latest_posts', function ($join) {
                  $join->on('users.id', '=', 'latest_posts.user_id');
                  })->get();

           use Illuminate\Support\Facades\DB;

           $first = DB::table('users')
                  ->whereNull('first_name');

           $users = DB::table('users')
                  ->whereNull('last_name')
                  ->union($first)
                  ->get();

           $users = DB::table('users')
                ->where('votes', '=', 100)
                ->where('age', '>', 35)
                ->get();

           $users = DB::table('users')->where('votes', 100)->get();

           $users = DB::table('users')
                ->where('votes', '>=', 100)
                ->get();

           $users = DB::table('users')
                ->where('votes', '<>', 100)
                ->get();

           $users = DB::table('users')
                ->where('name', 'like', 'T%')
                ->get();

           $users = DB::table('users')->where([
                ['status', '=', '1'],
                ['subscribed', '<>', '1'],
                ])->get();

           $users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();

           $users = DB::table('users')
            ->where('votes', '>', 100)
            ->orWhere(function($query) {
                $query->where('name', 'Abigail')
                      ->where('votes', '>', 50);
                })
                ->get();

           //select * from users where votes > 100 or (name = 'Abigail' and votes > 50)

           $users = DB::table('users')
                ->where('preferences->dining->meal', 'salad')
                ->get();
           
           $users = DB::table('users')
                ->whereJsonContains('options->languages', 'en')
                ->get();
           
           $users = DB::table('users')
                ->whereJsonContains('options->languages', ['en', 'de'])
                ->get();

           $users = DB::table('users')
                ->whereJsonLength('options->languages', 0)
                ->get();

           $users = DB::table('users')
                ->whereJsonLength('options->languages', '>', 1)
                ->get();

            $users = DB::table('users')
                ->whereBetween('votes', [1, 100])
                ->get();

            $users = DB::table('users')
                    ->whereNotBetween('votes', [1, 100])
                    ->get();

            $users = DB::table('users')
                    ->whereIn('id', [1, 2, 3])
                    ->get();

            $users = DB::table('users')
                ->whereNull('updated_at')
                ->get();

            $users = DB::table('users')
                ->whereNotNull('updated_at')
                ->get();

            $users = DB::table('users')
                ->whereDate('created_at', '2016-12-31')
                ->get();

            $users = DB::table('users')
                ->whereMonth('created_at', '12')
                ->get();

            $users = DB::table('users')
                ->whereDay('created_at', '31')
                ->get();

            $users = DB::table('users')
                ->whereYear('created_at', '2016')
                ->get();

            $users = DB::table('users')
                ->whereTime('created_at', '=', '11:20:45')
                ->get();

            $users = DB::table('users')
                ->whereColumn('first_name', 'last_name')
                ->get();

            $users = DB::table('users')
                ->whereColumn('updated_at', '>', 'created_at')
                ->get();

            $users = DB::table('users')
                ->whereColumn([
                    ['first_name', '=', 'last_name'],
                    ['updated_at', '>', 'created_at'],
                ])->get();

            $users = DB::table('users')
                ->where('name', '=', 'John')
                    ->where(function ($query) {
                    $query->where('votes', '>', 100)
                      ->orWhere('title', '=', 'Admin');
           })
           ->get();

           $users = DB::table('users')
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('orders')
                     ->whereColumn('orders.user_id', 'users.id');
           })
           ->get();

           select * from users
               where exists (
                    select 1
                    from orders
                    where orders.user_id = users.id
           )

           use App\Models\User;

           $users = User::where(function ($query) {
                $query->select('type')
                     ->from('membership')
                     ->whereColumn('membership.user_id', 'users.id')
                     ->orderByDesc('membership.start_date')
                     ->limit(1);
                }, 'Pro')->get();


           use App\Models\Income;

           $incomes = Income::where('amount', '<', function ($query) {
                 $query->selectRaw('avg(i.amount)')->from('incomes as i');
            })->get();


           $users = DB::table('users')
                ->orderBy('name', 'desc')
                ->get();

           
           $users = DB::table('users')
                ->orderBy('name', 'desc')
                ->orderBy('email', 'asc')
                ->get();

           $user = DB::table('users')
                ->latest()
                ->first();

           $randomUser = DB::table('users')
                ->inRandomOrder()
                ->first();

           $query = DB::table('users')->orderBy('name');
                $unorderedUsers = $query->reorder()->get();

           $query = DB::table('users')->orderBy('name');
                 $usersOrderedByEmail = $query->reorder('email', 'desc')->get();

           $users = DB::table('users')
                ->groupBy('account_id')
                ->having('account_id', '>', 100)
                ->get();

           
           $report = DB::table('orders')
                ->selectRaw('count(id) as number_of_orders, customer_id')
                ->groupBy('customer_id')
                ->havingBetween('number_of_orders', [5, 15])
                ->get();

           
           $users = DB::table('users')
                ->groupBy('first_name', 'status')
                ->having('account_id', '>', 100)
                ->get();

           $users = DB::table('users')->skip(10)->take(5)->get();

           $users = DB::table('users')
                ->offset(10)
                ->limit(5)
                ->get();

           $role = $request->input('role');

cc         $users = DB::table('users')
                ->when($role, function ($query, $role) {
                    return $query->where('role_id', $role);
                })
                ->get();


          $sortByVotes = $request->input('sort_by_votes');

          $users = DB::table('users')
                ->when($sortByVotes, function ($query, $sortByVotes) {
                    return $query->orderBy('votes');
                }, function ($query) {
                    return $query->orderBy('name');
                })
                ->get();

          DB::table('users')->insert([
                'email' => 'kayla@example.com',
                'votes' => 0
          ]);

          DB::table('users')->insert([
               ['email' => 'picard@example.com', 'votes' => 0],
               ['email' => 'janeway@example.com', 'votes' => 0],
           ]);

          DB::table('users')->insertOrIgnore([
               ['id' => 1, 'email' => 'sisko@example.com'],
               ['id' => 2, 'email' => 'archer@example.com'],
          ]);

          $id = DB::table('users')->insertGetId(
               ['email' => 'john@example.com', 'votes' => 0] 
          );

          DB::table('flights')->upsert([
               ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
               ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
               ], ['departure', 'destination'], ['price']);

          $affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1]);

          DB::table('users')
             ->updateOrInsert(
             ['email' => 'john@example.com', 'name' => 'John'],
             ['votes' => '2']
           );

           $affected = DB::table('users')
              ->where('id', 1)
              ->update(['options->enabled' => true]);

           
           DB::table('users')->increment('votes');
           DB::table('users')->increment('votes', 5);
           DB::table('users')->decrement('votes');
           DB::table('users')->decrement('votes', 5);
           //You may also specify additional columns to update during the operation:
           DB::table('users')->increment('votes', 1, ['name' => 'John']);


           DB::table('users')->delete();
           DB::table('users')->where('votes', '>', 100)->delete();

           DB::table('users')->truncate();

           DB::table('users')
                 ->where('votes', '>', 100)
                 ->sharedLock()
                 ->get();

           DB::table('users')
                ->where('votes', '>', 100)
                ->lockForUpdate()
                ->get();

           DB::table('users')->where('votes', '>', 100)->dd();
           DB::table('users')->where('votes', '>', 100)->dump();


?>