<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Meal;
use App\Models\Weight;


class CalendarController extends Controller
{
    private $meal;
    private $user;


    public function __construct(Meal $meal, User $user){
        $this->meal = $meal;
        $this->user = $user;
    }

    public function show()
    {
        $user = Auth::user();
        $user->load('meals');
        $currentDate = Carbon::now();
        $month = $currentDate->format('F');
        $year = $currentDate->format('Y');
        $day = $currentDate->day;
        $weightChartData = $this->displayWeightChart();
        $meal = null;
        if (Auth::check()) {
            $latestMeals = Meal::where('user_id', Auth::id())
                ->whereDate('record_date', Carbon::today())
                ->latest()
                ->first();
            if ($latestMeals) {
                $meal = $latestMeals;
            }
        }
        $latestMealsByDay = Meal::where('user_id', Auth::id())
            ->whereYear('record_date', $year)
            ->whereMonth('record_date', $currentDate->format('m'))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->record_date)->format('d');
            });
        \Log::info('Fetched meals:', $latestMealsByDay->toArray());
        if (!$user) {
            Log::error('Unable to find user');
        }
        return view('weight_and_meals.weight_and_meals', compact('month', 'year', 'day', 'user','meal','weightChartData','latestMealsByDay'));
    }

    public function displayWeightChart()
    {
        $userId = Auth::id();
        $goalWeight = User::find($userId)->goal_weight;
        $weights = Weight::selectRaw('MONTH(record_date) as month, AVG(current_weight) as avg_weight')
            ->where('user_id', $userId)
            ->groupBy('month')
            ->get();
        $chartData = [['MONTH', 'Average Weight', 'Goal Weight']];
        foreach ($weights as $weight) {
            $monthName = Carbon::createFromFormat('!m', $weight->month)->format('F');
            $chartData[] = [
                $monthName,
                $weight->avg_weight,
                $goalWeight
            ];
        }
        return $chartData;
    }
    
    public function getMealByDate($year, $month, $day)
    {
        // 日付を作成
        $date = Carbon::create($year, $month, $day)->format('Y-m-d');

        // 日付に一致するデータを取得
        $meal = Meal::whereDate('record_date', $date)->orderBy('created_at', 'desc')->first();

        // データをJSON形式で返す
        if ($meal) {
            return response()->json([
                'id' => $meal->id,
                'record_date' => $meal->record_date,
                'created_at' => $meal->created_at->toDateTimeString(),
                'image' => $meal->image,
                'description' => $meal->description
            ]);
            // return response()->json($meal);
        } else {
            return response()->json(null, 204); // データが見つからない場合は204 No Contentを返す
        }
    }

}
    





