<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cronograma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CalendarController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $user = Auth::user();
        $cronograma = Cronograma::where('user_id', $user->id)->get();

        $eventos = [];
        foreach ($cronograma as $item) {
            $evento = [
                'title' => $item->materia,
                'start' => Carbon::parse($item->data)->setTime($item->horario_inicial, 0, 0),
                'end' => Carbon::parse($item->data)->setTime($item->horario_final, 0, 0),
            ];
            $eventos[] = $evento;
        }

        return view('site.calendar.calendarIndex', compact('user', 'eventos'));
    }

    public function create()
    {

        return view('site.calendar.create.calendarCreate');
    }


    public function store(Request $request)
    {
        $horasPorDia = $request->input('horasPorDia');
        $numDias = $request->input('numDias');
        $estudarVestibular = $request->has('vestibular');
        $materiasVestibular = ['Química', 'Física', 'Biologia', 'Redação', 'Literatura', 'Ciências da Natureza', 'Ciências Humanas', 'Língua Estrangeira'];

        // Validar os dados do formulário
        $rules = [
            'horasPorDia' => 'required',
            'numDias' => 'required',
        ];

        if ($request->has('vestibular')) {
            $rules['vestibular'] = 'accepted';
        }

        $request->validate($rules);

        // Horário inicial e final
        $horarioInicial = 8;
        $horarioFinal = 20;

        // Salvar os dados no banco de dados
        $user = Auth::user();

        $datas = [];
        for ($i = 0; $i < $numDias; $i++) {
            $datas[] = now()->addDays($i)->format('Y-m-d');
        }

        // Verificar se ainda há dias para agendar
        $numDiasAgendados = Cronograma::where('user_id', $user->id)
            ->whereIn('data', $datas)
            ->count();

        $diasRestantes = $numDias - $numDiasAgendados;

        if ($diasRestantes <= 0) {
            return redirect()->back()->with('error', 'Você já definiu um cronograma. Não é possível gerar um novo cronograma.');
        }

        // Agendar as matérias nos dias restantes
        $horarioAtual = $horarioInicial;
        $indiceMateria = 0;

        for ($i = 0; $i < $diasRestantes; $i++) {
            $data = $datas[$numDiasAgendados + $i];
            $horasAgendadas = 0;

            while ($horasAgendadas < $horasPorDia) {
                $horarioFinal = $horarioAtual + 1;

                if ($horarioFinal > $horarioFinal) {
                    break;
                }

                $materia = $materiasVestibular[$indiceMateria];

                Cronograma::create([
                    'user_id' => $user->id,
                    'data' => $data,
                    'materia' => $materia,
                    'horario_inicial' => $horarioAtual,
                    'horario_final' => $horarioFinal,
                ]);

                $horasAgendadas++;
                $horarioAtual = $horarioFinal;
                $indiceMateria = ($indiceMateria + 1) % count($materiasVestibular);
            }

            $horarioAtual = $horarioInicial;
        }

        return redirect()->back()->with('success', 'Cronograma gerado com sucesso!');
    }
}
