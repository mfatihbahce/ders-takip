@extends('layouts.admin')

@section('title')
    Başvurular
@endsection

@section('heading')
    Başvurular
@endsection

@section('subheading')
    Gelen kayıt formu başvuruları
@endsection

@section('content')
    <div class="card">
        @if ($applications->isEmpty())
            <div class="muted">Henüz başvuru yok.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Öğrenci</th>
                        <th>T.C.</th>
                        <th>Veli</th>
                        <th>Sınıflar</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>
                                <div style="font-weight:900">{{ $application->student_name }} {{ $application->student_surname }}</div>
                                <div class="small">{{ $application->current_school }}</div>
                                @php
                                    $genderLabel = match ($application->gender ?? '') {
                                        'kadin' => 'Kadın',
                                        'erkek' => 'Erkek',
                                        'diger' => 'Diğer',
                                        'belirtmek_istemiyorum' => 'Cinsiyet belirtilmedi',
                                        default => null,
                                    };
                                    $extraParts = array_filter([
                                        $application->grade_level,
                                        $genderLabel,
                                        $application->student_phone,
                                    ]);
                                @endphp
                                @if (count($extraParts))
                                    <div class="small" style="margin-top:4px;color:#64748b">{{ implode(' · ', $extraParts) }}</div>
                                @endif
                            </td>
                            <td>{{ $application->identity_number }}</td>
                            <td>
                                <div style="font-weight:800">{{ $application->parent_name }} {{ $application->parent_surname }}</div>
                                <div class="small">{{ $application->parent_phone }}</div>
                            </td>
                            <td>
                                @if ($application->classes->isEmpty())
                                    <span class="muted">-</span>
                                @else
                                    <div style="display:flex;flex-wrap:wrap;gap:6px">
                                        @foreach ($application->classes as $class)
                                            <span class="badge">{{ $class->name }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                            <td><span class="badge">{{ $application->status }}</span></td>
                            <td class="muted">{{ $application->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top:14px">
                {{ $applications->links() }}
            </div>
        @endif
    </div>
@endsection
