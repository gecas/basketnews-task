<template>

    <div class="h-full flex">

        <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
            <div class="flex-1 relative z-0 flex overflow-hidden">
                <main
                    class="hidden xl:order-first xl:flex xl:flex-col flex-shrink-0 w-1/2 mx-auto border-r border-gray-200">
                    <div class="px-6 pt-6 pb-4">
                        <h2 class="text-lg font-medium text-gray-900">NBA games</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Search of {{ count }} NBA games
                        </p>
                        <form class="mt-6 flex space-x-4" action="#">
                            <div class="flex-1 min-w-0">
                                <div class="relative rounded-md shadow-sm w-full flex justify-between">
                                    <select2 class="w-full" v-model="selectedDate" :placeholder="'Select date'"
                                             :options="gameDates"
                                             @select="filterByDate($event)"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Directory list -->
                    <nav class="flex-1 min-h-0 overflow-y-auto" aria-label="Directory">
                        <div class="relative">
                            <div v-for="(gameList, index) in allGames" :key="gameList.id">
                                <div
                                    class="z-10 sticky top-0 border-t border-b border-gray-200 bg-gray-50 px-6 py-1 text-sm font-medium text-gray-500">
                                    <h3>{{ index }}</h3>
                                </div>
                                <ul role="list" class="relative z-0 divide-y divide-gray-200">
                                    <li v-for="(game, i) in gameList" :key="game.id">
                                        <div
                                            class="relative px-6 py-5 flex justify-between items-center space-x-3 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-pink-500">
                                            <div class="w-1/3 flex items-center space-x-2">
                                                <div class="flex-shrink-0">
                                                    <img class="h-10 w-10"
                                                         :src="'/assets/nba_logos/'+ game.home_team_name.toLowerCase().replace(' ', '-')+'.svg'"
                                                         alt=""/>
                                                </div>
                                                <div class="min-w-0">
                                                    <a href="#" class="focus:outline-none">
                                                        <!-- Extend touch target to entire panel -->
                                                        <span class="absolute inset-0" aria-hidden="true"/>
                                                        <p class="text-sm font-medium text-gray-900">
                                                            {{ game.home_team_city + ' ' + game.home_team_name }}
                                                        </p>
                                                        <p class="text-xs text-gray-500 truncate">
                                                            {{ game.home_team_record }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="w-1/3 flex flex-col">
                                                <h1 class="text-4xl text-center">
                                                    {{ game.home_team_points + '-' + game.away_team_points }}</h1>
                                                <span
                                                    class="text-xs text-center text-gray-500">
                                                {{ game.arena + ', ' + game.city + ', ' + game.state }}</span>
                                            </div>
                                            <div class="w-1/3 flex items-center space-x-2">
                                                <div class="flex-shrink-0">
                                                    <img class="h-10 w-10"
                                                         :src="'/assets/nba_logos/'+ game.away_team_name.toLowerCase().replace(' ', '-')+'.svg'"
                                                         alt=""/>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <a href="#" class="focus:outline-none">
                                                        <!-- Extend touch target to entire panel -->
                                                        <span class="absolute inset-0" aria-hidden="true"/>
                                                        <p class="text-sm font-medium text-gray-900">
                                                            {{ game.away_team_city + ' ' + game.away_team_name }}
                                                        </p>
                                                        <p class="text-xs text-gray-500 truncate">
                                                            {{ game.away_team_record }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import {
    Dialog,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions
} from '@headlessui/vue'
import {
    MenuIcon,
    XIcon,
} from '@heroicons/vue/outline'
import {
    ChevronLeftIcon,
    FilterIcon,
    MailIcon,
    PhoneIcon,
    SearchIcon,
    CheckIcon,
    SelectorIcon
} from '@heroicons/vue/solid'

export default {
    props: ['count', 'games', 'dates'],

    components: {
        Dialog,
        DialogOverlay,
        TransitionChild,
        TransitionRoot,
        ChevronLeftIcon,
        FilterIcon,
        MailIcon,
        MenuIcon,
        PhoneIcon,
        SearchIcon,
        XIcon,
        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        SelectorIcon,
    },
    data() {
        return {
            selectedDate: null,
            gameDates: this.dates,
            allGames: this.games
        }
    },
    setup() {

        return {}
    },
    mounted() {
    },
    methods: {
        filterByDate: async function (event) {
            const response = await axios.post('/filterGamesByDate', {date: event.text})
            if (response.data.success) {
                this.allGames = response.data.games
            }
        }
    }
}
</script>
