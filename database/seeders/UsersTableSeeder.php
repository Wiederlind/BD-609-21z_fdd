<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Александр',
                'last_name' => 'Иванов',
                'email' => 'alexander.ivanov@example.com',
                'password' => Hash::make('пароль123'),
            ],
            [
                'first_name' => 'Мария',
                'last_name' => 'Смирнова',
                'email' => 'maria.smirnova@example.com',
                'password' => Hash::make('пароль456'),
            ],
            [
                'first_name' => 'Дмитрий',
                'last_name' => 'Петров',
                'email' => 'dmitry.petrov@example.com',
                'password' => Hash::make('пароль789'),
            ],
            [
                'first_name' => 'Екатерина',
                'last_name' => 'Фёдорова',
                'email' => 'ekaterina.fedorova@example.com',
                'password' => Hash::make('сильныйпароль'),
            ],
            [
                'first_name' => 'Иван',
                'last_name' => 'Сидоров',
                'email' => 'ivan.sidorov@example.com',
                'password' => Hash::make('запаснойпароль'),
            ],
            [
                'first_name' => 'Анна',
                'last_name' => 'Кузнецова',
                'email' => 'anna.kuznetsova@example.com',
                'password' => Hash::make('пароль111'),
            ],
            [
                'first_name' => 'Михаил',
                'last_name' => 'Воробьёв',
                'email' => 'mikhail.vorobyov@example.com',
                'password' => Hash::make('пароль222'),
            ],
            [
                'first_name' => 'Ольга',
                'last_name' => 'Морозова',
                'email' => 'olga.morozova@example.com',
                'password' => Hash::make('пароль333'),
            ],
            [
                'first_name' => 'Сергей',
                'last_name' => 'Лебедев',
                'email' => 'sergey.lebedev@example.com',
                'password' => Hash::make('пароль444'),
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Соколова',
                'email' => 'natalya.sokolova@example.com',
                'password' => Hash::make('пароль555'),
            ],
            [
                'first_name' => 'Виктор',
                'last_name' => 'Ковалёв',
                'email' => 'viktor.kovalev@example.com',
                'password' => Hash::make('пароль666'),
            ],
            [
                'first_name' => 'Юлия',
                'last_name' => 'Зайцева',
                'email' => 'yulia.zaytseva@example.com',
                'password' => Hash::make('пароль777'),
            ],
            [
                'first_name' => 'Павел',
                'last_name' => 'Ершов',
                'email' => 'pavel.ershov@example.com',
                'password' => Hash::make('пароль888'),
            ],
            [
                'first_name' => 'Татьяна',
                'last_name' => 'Карпова',
                'email' => 'tatiana.karpova@example.com',
                'password' => Hash::make('пароль999'),
            ],
            [
                'first_name' => 'Владимир',
                'last_name' => 'Григорьев',
                'email' => 'vladimir.grigoriev@example.com',
                'password' => Hash::make('пароль000'),
            ],
        ]);
    }
}
