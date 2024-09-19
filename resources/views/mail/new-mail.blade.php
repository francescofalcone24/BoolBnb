<x-mail::message>
	You have received a new message, here are the details:<br>
	Suite: {{ $message->suite->title }}<br>
	Name: {{ $message->name }}<br>
	Email: {{ $message->email }}<br>
	Message:
	{{ $message->text }}<br>
	Data: {{ $message->date }}<br>


	Thanks
	{{ config('app.name') }}
</x-mail::message>
