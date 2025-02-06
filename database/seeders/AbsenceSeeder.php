<?php

namespace Database\Seeders;

use App\Models\Absence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('alias', 'admin')->get();

        // Definimos algunas franjas horarias de ejemplo
        $hours = [
            '08:00-08:50',
            '08:50-09:40',
            '09:40-10:30',
            '10:30-10:50', // Recreo
            '10:50-11:40',
            '11:40-12:30',
            '12:30-13:20',
            '13:20-13:50', // Recreo
            '13:50-14:40',
            '14:40-15:30',
            '15:30-16:20',
            '16:20-17:10',
            '17:10-18:00',
            '18:00-18:50',
        ];

        // Para cada profesor creamos 3 ausencias aleatorias
        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                // Generamos una fecha aleatoria en los últimos 30 días
                $fecha = Carbon::now()->subDays(rand(0, 30))->toDateString();

                // Seleccionamos una franja horaria aleatoria
                $hora = $hours[array_rand($hours)];

                // Comentario de ejemplo (puedes personalizar o dejarlo vacío)
                $comment = "Comentario prueba.";

                Absence::create([
                    'user_id' => $user->id,
                    'date'    => $fecha,
                    'hour'    => $hora,
                    'comment' => $comment,
                ]);
            }
        }
    }
}
