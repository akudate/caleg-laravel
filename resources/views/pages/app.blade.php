@extends('layout-user.app')
@section('title', 'Caleg')
{{-- CSS --}}
<style>
    .rounded-image {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        border: 2px solid #FB0000;
        overflow: hidden;
        float: right;
    }

    .rounded-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .visi-image {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        border: 2px solid #FB0000;
        overflow: hidden;
        float: left;
    }

    .visi-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .misi-image {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        border: 2px solid #FB0000;
        overflow: hidden;
        float: right;
    }

    .misi-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

@section('content')

    <div class="container">
        {{-- NAMA --}}
        <table class="mb-5">
            <thead>
                <th class="col-6">
                    <div class="">
                        <h1 class="mt-5 mb-5" style="color: #000; font-weight:bolder; ">{{ $identitas->first()->nama }}</h1>
                        <span class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, ad incidunt
                            dolore esse
                            amet totam
                            quos eius labore explicabo in perferendis sapiente illum id mollitia aliquam vel voluptatibus
                            ducimus
                            praesentium! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus odio quibusdam,
                            beatae itaque sint nisi quia tempora. Provident voluptates voluptatum ad enim rem optio? Laborum
                            neque velit aliquid beatae libero! lore</span>
                    </div>
                </th>
                <th class="col-6">
                    <div class="rounded-image">
                        <img class="align-items-end" src="{{ asset('image/' . $identitas->first()->image) }}" alt="Image">
                    </div>
                </th>
            </thead>
        </table>
        {{-- VISI --}}
        <table class="mt-5">
            <thead>
                <th class="col-6">
                    <div class="visi-image">
                        <img class="align-items-end" src="{{ asset('image/' . $identitas->first()->image) }}"
                            alt="Image">
                    </div>
                </th>
                <th class="col-6">

                    <div class="">
                        <h1 class="mt-5 mb-5" style="color: #000; font-weight:bolder; ">VISI</h1>
                        <span class="">{{ $identitas->first()->visi }}</< /span>
                    </div>
                </th>
            </thead>
        </table>
        {{-- MISI --}}
        <table class="mt-5">
            <thead>

                <th class="col-6">
                    <div class="">
                        <h1 class="mt-5 mb-5" style="color: #000; font-weight:bolder; ">MISI</h1>
                        <span class="">{{ $identitas->first()->misi }}</< /span>
                    </div>
                </th>
                <th class="col-6">
                    <div class="misi-image">
                        <img class="align-items-end" src="{{ asset('image/' . $identitas->first()->image) }}"
                            alt="Image">
                    </div>
                </th>
            </thead>
        </table>

    </div>
@endsection
