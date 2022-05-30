import express from 'express'

const server = express()

const getMessages = async () => {
  const id = Math.floor((Math.random() * 10) + 1)
    id % 2 === 0 ?
      console.log(`id: ${id}`) :
      console.log(`id: ${id} - invalid`)
}

getMessages()

server.listen(5001, () => {
  console.log('Validator on 5001')
})
