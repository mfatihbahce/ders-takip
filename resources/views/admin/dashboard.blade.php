@extends('layouts.admin')

@section('title')
    Gösterge paneli
@endsection

@section('heading')
    Gösterge paneli
@endsection

@section('subheading')
    Genel bakış ve son başvurular
@endsection

@section('content')
    <div class="grid cols-3">
        <div class="card kpi">
            <div class="label">Toplam başvuru</div>
            <div class="value">{{ $stats['totalApplications'] }}</div>
        </div>
        <div class="card kpi">
            <div class="label">Yeni başvuru</div>
            <div class="value">{{ $stats['pendingApplications'] }}</div>
        </div>
        <div class="card kpi">
            <div class="label">Aktif sınıf</div>
            <div class="value">{{ $stats['activeClasses'] }}</div>
        </div>
    </div>

    <div class="card" style="margin-top:14px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <div style="font-weight:900">Son başvurular</div>
            <a class="btn secondary" href="{{ route('admin.applications.index') }}" style="padding:8px 12px;border-radius:999px">Tümünü gör</a>
        </div>

        @if ($latestApplications->isEmpty())
            <div class="muted">Henüz başvuru yok.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Öğrenci</th>
                        <th>Veli telefonu</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestApplications as $application)
                        <tr>
                            <td>
                                <div style="font-weight:800">{{ $application->student_name }} {{ $application->student_surname }}</div>
                                <div class="small">{{ $application->current_school }}</div>
                            </td>
                            <td>{{ $application->parent_phone }}</td>
                            <td><span class="badge">{{ $application->status }}</span></td>
                            <td class="muted">{{ $application->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
