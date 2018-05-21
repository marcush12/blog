<template>
    <nav class="custom-wrapper" id="menu">
                    <div class="pure-menu">
                        <a href="#" class='custom-toggle btn-bar' id='toggle'></a>
                    </div>
                    <ul class="container-flex list-unstyled">
                        <li class="pure-menu-item">
                            <router-link :to="{name: 'home'}" class="pure-menu-link c-gris-2 text-uppercase">
                                Início
                            </router-link>
                        </li>
                        <li class="pure-menu-item">
                            <router-link :to="{name: 'about'}" class="pure-menu-link c-gris-2 text-uppercase">
                                Sobre Nós
                            </router-link>
                        </li>
                        <li class="pure-menu-item">
                            <router-link :to="{name: 'archive'}" class="pure-menu-link c-gris-2 text-uppercase">
                                Arquivos
                            </router-link>
                        </li>
                        <li class="pure-menu-item">
                            <router-link :to="{name: 'contact'}" class="pure-menu-link c-gris-2 text-uppercase">
                                Contato
                            </router-link>
                        </li>
                    </ul>
                </nav>
</template>
