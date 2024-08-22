@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\preloaderHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
@php( $def_container_class = 'container' )
@else
@php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="{{ $layoutHelper->makeContentWrapperClasses() }}">

    {{-- Preloader Animation (cwrapper mode) --}}
    @if($preloaderHelper->isPreloaderEnabled('cwrapper'))
    @include('adminlte::partials.common.preloader')
    @endif

    {{-- Content Header --}}
    @hasSection('content_header')
    <div class="content-header">
        <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
            @if($errors->any())
            <x-adminlte-alert theme="danger" title="Failed">
                {{ implode('', $errors->all(':message')) }}
            </x-adminlte-alert>
            @endif
            @if(Session::has('success'))
            <x-adminlte-alert theme="success" title="Berhasil">
                {{ Session::get('success') }}
            </x-adminlte-alert>
            @endif
            @if(Session::has('error'))
            <x-adminlte-alert theme="danger" title="Gagal">
                {{ Session::get('error') }}
            </x-adminlte-alert>
            @endif

            @yield('content_header')
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <div class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @stack('content')
            @yield('content')
        </div>
    </div>

</div>