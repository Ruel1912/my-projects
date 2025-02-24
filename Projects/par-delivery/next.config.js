/** @type {import('next').NextConfig} */
const nextConfig = {
  images: {
    remotePatterns: [
      {
        protocol: "https",
        hostname: "storage.files.mow1.cloud.servers.ru",
        port: "8080",
        pathname: "**",
      },
      {
        protocol: "https",
        hostname: "online.moysklad.ru",
        port: "",
        pathname: "**/remap/**",
      },
      {
        protocol: "https",
        hostname: "pardelivery.hb.ru-msk.vkcloud-storage.ru",
        port: "",
        pathname: "**", // Замените на ** для разрешения всех изображений
      },
      {
        protocol: "https",
        hostname: "api.moysklad.ru",
        port: "",
        pathname: "**/remap/**",
      },
      {
        protocol: "https",
        hostname: "miniature-prod.moysklad.ru",
        port: "",
        pathname: "**/documentminiature/**",
      },
    ],
  },
};

module.exports = nextConfig;