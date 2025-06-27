<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'tutor_id' => 'required|exists:tutors,id',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Проверка на существующий отзыв для заказа
        $existingReview = Review::where('order_id', $validatedData['order_id'])->first();
        if ($existingReview) {
            return redirect()->route('profile')->with('error', 'Вы уже оставили отзыв для этого заказа.');
        }

        Review::create([
            'order_id' => $validatedData['order_id'],
            'user_id' => Auth::id(),
            'tutor_id' => $validatedData['tutor_id'],
            'content' => $validatedData['content'],
            'rating' => $validatedData['rating'],
        ]);

        return redirect()->route('profile')->with('success', 'Отзыв успешно добавлен.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'Вы не можете удалить этот отзыв.');
        }

        $review->delete();

        return redirect()->route('profile')->with('success', 'Отзыв успешно удалён.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'Вы не можете изменить этот отзыв.');
        }

        $review->update($validatedData);

        return redirect()->route('profile')->with('success', 'Отзыв успешно изменён.');
    }
}
