const init = async () => {
  console.log('Service on')
  const id = Math.floor((Math.random() * 10) + 1)
    id % 2 === 0 ?
      console.log(`id: ${id}`) :
      console.log(`id: ${id} - invalid`)
}

init()
