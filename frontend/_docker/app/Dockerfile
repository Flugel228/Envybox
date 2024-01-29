FROM node:20

RUN npm install -g @vue/cli

WORKDIR /app
COPY ../../package*.json ./

COPY ../../ .

RUN npm install


CMD ["npm", "run", "build"]

CMD ["npm", "run", "serve"]