// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  router: {
    options: {
      hashMode: false,
    },
  },
  ssr: true,
  runtimeConfig: {
    public: {
      baseURL:
        process.env.NODE_ENV === "production" ? "https://dropshippingapi.futuregenit.com/api/" : "http://127.0.0.1:8000/api/",
    },
  },
  pages: true,
  devtools: { enabled: true },
  experimental: {
    payloadExtraction: true,
  },
  //css: ["~/assets/css/main.css"],

  // postcss: {
  //   plugins: {
  //     tailwindcss: {},
  //     autoprefixer: {},
  //   },
  // },
  plugins: [
    // Specify the path to your plugin file
    "~/plugins/axios.js",
    "~/plugins/owlCarousel.js",
    "~/plugins/jquery.js",
    // Add other plugins as needed
  ],
  modules: [
    "nuxt-icon",
    "nuxt-lodash",
    "@pinia/nuxt",
    "@pinia-plugin-persistedstate/nuxt",
    "@vite-pwa/nuxt",
  ],
  pwa: {
    manifest: {
      name: "Test App",
      short_name: "Test App",
      description: "Test App",
      theme_color: "#32CD32",
      icons: [
        {
          src: "pwa-192x192.png",
          sizes: "192x192",
          type: "image/png",
        },
        {
          src: "pwa-512x512.png",
          sizes: "512x512",
          type: "image/png",
        },
      ],
    },
    devOptions: {
      enabled: true,
      type: "module",
    },
  },

  app: {
    head: {
      charset: "utf-8",
      viewport: "width=device-width, initial-scale=1, maximum-scale=1",
      // Add CSS file
      link: [
        //Fronend
        { rel: "stylesheet",href: "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"},
        { rel: "stylesheet",href: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"},
        { rel: "stylesheet",href: "https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"},
        { rel: "stylesheet",href: "https://fonts.googleapis.com"},
        { rel: "stylesheet",href: "https://fonts.gstatic.com"},
        { rel: "stylesheet",href: "https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap"},
        { rel: "stylesheet",href: "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"},
        { rel: "stylesheet",href: "/assets/css/animate.css"},
        { rel: "stylesheet",href: "/assets/css/owl.carousel.min.css"},
        { rel: "stylesheet",href: "/assets/css/owl.theme.default.min.css"},
        { rel: "stylesheet",href: "/assets/css/styles.css"},
          //For Partner
        { rel: "stylesheet",href: "/assets/css/adminlte.min.css"},
        //{ rel: "stylesheet",href: "/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"},
        { rel: "stylesheet",href: "/assets/css/panel.style.css"},
        
        
      ],
      // Add JavaScript file
      script: [
        //{ src: "https://code.jquery.com/jquery-3.6.0.min.js", type: "text/javascript" },
        { src: "https://code.jquery.com/jquery-3.7.1.js", type: "text/javascript" },
        { src: "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js", type: "text/javascript"},
        { src: "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js", type: "text/javascript"},
        { src: "/assets/js/owl.carousel.min.js", type: "text/javascript" },
        { src: "/assets/js/wow.min.js", type: "text/javascript" },
          //For Partner 
        { src: "/assets/js/adminlte.js", type: "text/javascript" },
        { src: "https://unpkg.com/sweetalert/dist/sweetalert.min.js",type: "text/javascript" },
        { src: "https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/6/tinymce.min.js",type: "text/javascript" },
      ],
    },
  },
});
