# Команда для старта

```npx create-next-app@latest```

# Установка линтера Typescript

```npm i -D eslint @typescript-eslint/parser @typescript-eslint/eslint-plugin```

Создать файл .eslintrc.json

# Установка линтера css

```npm i -D stylelint@13.13.1 stylelint-config-standard@22.0.0 stylelint-order@4.1.0 stylelint-order-config-standard@0.1.3 --legacy-peer-deps```

Создать файл .stylelintrc.json

Установить расширение stylelint

В package.json в Scripts добавить:

```"stylelint": "stylelint \"**/*.css\" --fix"```

# Debug

В package.json в Scripts добавить:
 
```"debug": "set NODE_OPTIONS=--inspect && npm run dev"```