<x-app-layout>
    <table class="mx-auto mt-4">
        <thead>
            <tr class="bg-gray-800 text-white mt-4">
                <th class="w-32">Nombre</th>
                <th class="w-32">Descripcion</th>
                <th class="w-32">Daño</th>
                <th class="w-32">Alcance</th>
                <th class="w-32">Usos</th>
                <th class="w-32">Cargador</th>
                <th class="w-32">Valor legal</th>
                <th class="w-32">Mercado negro</th>
                <th class="w-32">Fd</th>
                <th class="w-32">Epoca</th>
                <th class="w-32">Tipo de arma</th>
                <th class="w-32">Especializacion</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td class="w-32">{{$arma->nombre}}</td>
                <td class="w-32">{{$arma->descripcion}}</td>
                <td class="w-32">{{$arma->dano}}</td>
                <td class="w-32">{{$arma->alcance}}</td>
                <td class="w-32">{{$arma->usos}}</td>
                <td class="w-32">{{$arma->cargador}}</td>
                <td class="w-32">{{$arma->valorLegal}}</td>
                <td class="w-32">{{$arma->valorIlegal}}</td>
                <td class="w-32">{{$arma->fd}}</td>
                <td class="w-32">{{$arma->epoca}}</td>
                <td class="w-32">{{$arma->tipo_arma_id}}</td>
                <td class="w-32">{{$arma->especializacion_id}}</td>
            </tr>
        </tbody>
    </table>
</x-app-layout>