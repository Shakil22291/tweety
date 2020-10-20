<template>
    <div>
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item" v-for="tab in tabs" :key="tab.name">
                <a
                    :class="{ active: tab.isActive }"
                    @click="selectTab(tab)"
                    class="nav-link"
                    :href="tab.href"
                    >{{ tab.name }}</a
                >
            </li>
        </ul>
        <div class="tab-detailes">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tabs: []
        };
    },
    created() {
        this.tabs = this.$children;
    },
    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = tab.name == selectedTab.name;
            });
        }
    }
};
</script>
