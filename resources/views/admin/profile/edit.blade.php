@extends('layouts.admin')

@section('title')
    Profil
@endsection

@section('heading')
    Profil ayarları
@endsection

@section('subheading')
    Yönetici hesabı bilgilerinizi güncelleyin
@endsection

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('admin.profile.update') }}" class="stack">
            @csrf
            @method('PUT')

            <div class="grid-form">
                <div class="field">
                    <label>Ad soyad <span class="required">*</span></label>
                    <input name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="field">
                    <label>E-posta <span class="required">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>

            <div class="grid-form">
                <div class="field">
                    <label>Yeni şifre</label>
                    <input type="password" name="password" autocomplete="new-password" placeholder="Değiştirmek istemiyorsanız boş bırakın">
                </div>
                <div class="field">
                    <label>Yeni şifre (tekrar)</label>
                    <input type="password" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>

            <div>
                <button class="btn" type="submit">Kaydet</button>
            </div>
        </form>
    </div>
@endsection
