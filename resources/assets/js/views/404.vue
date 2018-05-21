<template>
    <section class="pages container">
    <div class="page page-about">
        <h1 class="text-capitalize">Página não encontrada</h1>
        <p>Voltar para
            <!-- <a href="{{route('pages.home')}}">Início - Home</a> -->
            <router-link :to="{name: 'home'}">Início - Home</router-link>
        </p>
    </div>
    </section>
</template>
