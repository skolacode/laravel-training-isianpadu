@extends('layouts.main')

@section('title', 'Currency By BNM')

@section('content')

<div class="container" style="margin-top: 5em">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Country Code</th>
        <th scope="col" style="text-align: center">Unit</th>
        <th scope="col" style="text-align: center">Buying Rate</th>
        <th scope="col" style="text-align: center">Selling Rate</th>
      </tr>
    </thead>
    <tbody>
      @for ($i=0; $i<count($decodeData->data); $i++)

        @php
          $currency = $decodeData->data[$i]
        @endphp

        <tr>
          <th scope="row">{{ $i+1 }}</th>
          <td>{{ $currency->currency_code }}</td>
          <td style="text-align: center">{{ $currency->unit }}</td>
          <td style="text-align: center">{{ $currency->rate->buying_rate }}</td>
          <td style="text-align: center">{{ $currency->rate->selling_rate }}</td>
        </tr>
      @endfor
    </tbody>
  </table>
</div>

@endsection