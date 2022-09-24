// Styles
import '@mdi/font/css/materialdesignicons.min.css'
import 'vuetify/styles'
import { aliases, mdi } from "vuetify/iconsets/mdi";
import themes from "../theme";

// Vuetify
import { createVuetify } from 'vuetify'

export default createVuetify({
  theme: themes,
  icons: {
      defaultSet: "mdi",
      aliases,
      sets: {
          mdi,
      },
  },
});