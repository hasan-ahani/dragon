<template>
    <li
        :class="[
      `bg-${color}  z-50`,
      {
        'mb-2': position.includes('top'),
        'mt-2': position.includes('bottom')
      }
    ]"
        class="relative overflow-hidden p-3 bg-gray-800 items-center text-indigo-100 leading-none rounded-lg flex lg:inline-flex cursor-pointer select-none"
        role="alert"
        @click="$emit('remove')"
    >
        <!-- Loading bar -->
        <div
            class="absolute bg-white opacity-25 left-0 bottom-0 h-1"
            :style="{ width: percentageElapsed + '%' }"
        />

        <!-- Message -->
        <span class="font-semibold mr-2 text-left flex-1">{{ message }}</span>

        <!-- Icon -->
        <svg
            :class="[position]"
            class="block fill-current opacity-75 h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
        >
            <path
                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"
            />
        </svg>
    </li>
</template>

<script>
// If you are creating a new component from this, you should use:
import ToastMixin from "vue-my-toasts/src/mixins/ToastMixin"
import TimerMixin from "vue-my-toasts/src/mixins/TimerMixin"

export default {
    name: "Toast",

    mixins: [ToastMixin, TimerMixin],

    props: {
        badge: {
            type: [String, Boolean],
            required: false,
            default: false
        }
    },

    computed: {
        color() {
            switch (this.type) {
                case "base":
                    return "primary";
                case "warning":
                    return "warning";
                case "error":
                    return "danger";
                case "success":
                    return "success";
                default:
                    return "primary";
            }
        }
    }
};
</script>

<style scoped>
svg.bottom-middle {
    transform: rotate(90deg);
}

svg.top-middle {
    transform: rotate(-90deg);
}

svg.bottom-left {
    transform: rotate(180deg);
}

svg.top-left {
    transform: rotate(180deg);
}
</style>
