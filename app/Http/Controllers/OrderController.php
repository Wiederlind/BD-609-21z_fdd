<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tutor_id' => 'required|exists:tutors,id',
            'subject_id' => 'required|exists:subjects,id',
            'lesson_date' => 'required|date',
            'lesson_time' => 'required|date_format:H:i', // Валидация времени
            'duration' => 'required|integer|min:30',
        ]);

        // Объединение даты и времени
        $lessonDateTime = $validatedData['lesson_date'] . ' ' . $validatedData['lesson_time'];

        $order = Order::create([
            'user_id' => Auth::id(),
            'tutor_id' => $validatedData['tutor_id'],
            'subject_id' => $validatedData['subject_id'],
            'lesson_date' => $lessonDateTime, // Сохранение даты и времени
            'duration' => $validatedData['duration'],
            'status' => 'pending',
        ]);

        return redirect()->intended('/')->with('success', 'Урок успешно забронирован!');
    }

    public function rate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'Вы не можете оценить этот заказ.');
        }

        $order->update([
            'rating' => $validatedData['rating'],
            'review_content' => $validatedData['content'],
        ]);

        return redirect()->route('profile')->with('success', 'Рейтинг успешно добавлен.');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        // Проверка, что пользователь может отменить только свои заказы
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'Вы не можете отменить этот заказ.');
        }

        $order->delete();

        return redirect()->route('profile')->with('success', 'Заказ успешно отменён.');
    }
}
