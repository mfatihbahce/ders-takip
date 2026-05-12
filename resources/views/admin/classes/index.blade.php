@extends('layouts.admin')

@section('title')
    Sınıflar
@endsection

@section('heading')
    Sınıf oluştur
@endsection

@section('subheading')
    Kayıt formunda görünecek sınıfları buradan yönetin
@endsection

@section('content')
    <div class="stack">
        <div class="card">
            <div style="font-weight:900;margin-bottom:12px">Yeni sınıf</div>
            <form method="POST" action="{{ route('admin.classes.store') }}" class="stack">
                @csrf
                <div class="grid-form">
                    <div class="field">
                        <label>Sınıf adı <span class="required">*</span></label>
                        <input name="name" value="{{ old('name') }}" required placeholder="Örnek: Robotik">
                    </div>
                    <div class="field">
                        <label>Durum</label>
                        <label class="small" style="display:flex;gap:10px;align-items:center;margin-top:6px">
                            <input type="checkbox" name="is_active" value="1" checked>
                            Aktif (formda listelenir)
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label>Açıklama</label>
                    <textarea name="description" placeholder="İsteğe bağlı">{{ old('description') }}</textarea>
                </div>
                <div>
                    <button class="btn" type="submit">Sınıfı kaydet</button>
                </div>
            </form>
        </div>

        <div class="card">
            <div style="font-weight:900;margin-bottom:10px">Sınıf listesi</div>

            @if ($classes->isEmpty())
                <div class="muted">Henüz sınıf yok.</div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Sınıf</th>
                            <th>Durum</th>
                            <th>Oluşturulma</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>
                                    <div style="font-weight:900">{{ $class->name }}</div>
                                    @if ($class->description)
                                        <div class="small">{{ $class->description }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($class->is_active)
                                        <span class="badge">Aktif</span>
                                    @else
                                        <span class="badge">Pasif</span>
                                    @endif
                                </td>
                                <td class="muted">{{ $class->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style="margin-top:14px">
                    {{ $classes->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
