
<x-layout>
	<x-slot:title>Обо мне</x-slot:title>
	<p style="color: {{ $color }}">Меня зовут {{ $myData['name'] }} {{ $myData['surname'] }}</p>
	<p>Мне: {{ $myData['age'] }} лет</p>
	@if ($myData['age'] > 18) 
		<p>Я уже совершеннолетний</p>
	@elseif ($myData['age'] == 18)
		<p>Я достиг совершеннолетия</p>
	@else
		<p>Я несовершеннолетний</p>
	@endif
	<p>Моя зп: {{ $myData['salary'] }}</p>
	<div>
		<input type="text" value="{{ $inp1 }}">
		<input type="text" value="{{ $inp2 }}">
		<input type="text" value="{{ $inp3 }}">
		<a href="{{ $linkHref }}">{{ $linkText }}</a>
	</div>
	<div>Сегодня: {{ date('d.m.Y') }}</div>
	<div>Я родился {{ $birthday['day'] ?? date('d') }}.{{ $birthday['month'] ?? date('m') }}.{{ $birthday['year'] ?? date('y') }} </div>
	<div>Город: {{ $city ?? 'Москва' }}</div>
	<div>
		Хотел бы жить в городе {{ $location['city'] ?? 'Москва' }} страны {{ $location['country'] ?? 'Россия' }}
	</div>
	<div>
		<p>Массив с числами:</p>
		<ul>
			@foreach ($numbers as $number)
				@continue($number == 0)
				@if ($loop->remaining <= 2)
				<li><i>{{ sqrt($number ** 2) }}</i></li>					
				@else
				<li><b>{{ sqrt($number ** 2) }}</b></li>
				@endif
			@endforeach
		</ul>
	</div>
	<table>
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Зарплата</th>
		</tr>
		@foreach ($employees as $employee)
		@if ($employee['salary'] > 2000)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $employee['name'] }}</td>
				<td>{{ $employee['surname'] }}</td>
				<td>{{ $employee['salary'] }}</td>
			</tr>
		@endif
		@endforeach
	</table>
	{{-- Вывод неэкранированной переменной --}}
	{!! $str !!}
	@forelse ($users as $user)
		@if ($loop->first)
		<p class="first">{{ $loop->iteration }} {{ $user }}</p>
		@elseif ($loop->last)
		<p class="last">{{ $loop->iteration }} {{ $user }}</p>
		@else
		<p>{{ $loop->iteration }} {{ $user }}</p>
		@endif
	@empty
		<p>Нет пользователей</p>
	@endforelse

	@php
		echo 'работает'
	@endphp
	<h1>Практика:</h1>
	@forelse ($links as $link)
		<a href="{{ $link['href'] }}">{{ $link['text'] }}</a>
	@empty
		<p>Ссылок нет</p>
	@endforelse
	<ul>
	@foreach ($links as $link)
	<li>
		<a href="{{ $link['href'] }}">{{ $link['text'] }}</a>
	</li>
	@endforeach
	</ul>
	<table>
		<tr>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Статус</th>
		</tr>
		@foreach ($useres as $user)
			<tr style="color: {{ $user['banned'] ? '#f00' : '#0f0' }}">
				<td>{{ $user['name'] }}</td>
				<td>{{ $user['surname'] }}</td>
				<td>{{ $user['banned'] ? 'забанен' : 'активен' }}</td>
			</tr>
		@endforeach
	</table>
	<select>
		@foreach ($users as $user)
			@if ($loop->last)
			<option selected value="{{ $user }}">{{ $user }}</option>
			@else
			<option value="{{ $user }}">{{ $user }}</option>
			@endif
		@endforeach
	</select>
	<ul>
		@foreach ($months as $month)
			<li class="{{ $currDay == $month ? 'active' : ''}}">{{ $month }}</li>
		@endforeach
	</ul>
</x-layout>