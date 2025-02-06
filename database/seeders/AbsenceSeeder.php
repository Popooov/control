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
            // Bloque de la mañana
            '08:00-08:50 - 1ª hora (mañana)',
            '08:50-09:40 - 2ª hora (mañana)',
            '09:40-10:30 - 3ª hora (mañana)',
            '10:30-10:50 - Recreo (mañana)',
            '10:50-11:40 - 4ª hora (mañana)',
            '11:40-12:30 - 5ª hora (mañana)',
            '12:30-13:20 - 6ª hora (mañana)',
        
            // Bloque de la tarde
            '14:40 - 1ª hora (tarde)',
            '15:30 - 2ª hora (tarde)',
            '16:20 - 3ª hora (tarde)',
            '17:10 - 4ª hora (tarde)',
            '18:00 - 5ª hora (tarde)',
            '18:50 - 6ª hora (tarde)',
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
