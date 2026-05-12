@extends('layouts.admin')

@section('title')
    Site ayarları
@endsection

@section('heading')
    Site ayarları
@endsection

@section('subheading')
    Genel iletişim ve site bilgileri
@endsection

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="stack">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Site adı <span class="required">*</span></label>
                <input name="site_name" value="{{ old('site_name', $setting->site_name) }}" required>
            </div>

            <div class="grid-form">
                <div class="field">
                    <label>İletişim e-postası</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $setting->contact_email) }}" placeholder="info@site.com">
                </div>
                <div class="field">
                    <label>İletişim telefonu</label>
                    <input name="contact_phone" value="{{ old('contact_phone', $setting->contact_phone) }}" placeholder="+90 …">
                </div>
            </div>

            <div>
                <button class="btn" type="submit">Kaydet</button>
            </div>
        </form>
    </div>
@endsection
