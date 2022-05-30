const fs = require('fs/promises');

const writeFile = (content) => {
  fs.appendFile('src/message.txt', content, (error) => {
    if (error) {
      console.log('error!');
      throw error;
    }

    console.log('Save')
  })
}

const obj = {
  name: 'Maria',
  vote: 'Lina'
};

writeFile(JSON.stringify(obj));