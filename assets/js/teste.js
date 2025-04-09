<<<<<<< HEAD
// Importar módulos
const express = require('express');
const mongoose = require('mongoose');

// Configurar o aplicativo Express
const app = express();
app.use(express.json());

// Conectar ao MongoDB
mongoose.connect('mongodb://localhost:27017/todolist', { useNewUrlParser: true, useUnifiedTopology: true });
const db = mongoose.connection;


db.on('error', console.error.bind(console, 'Erro de conexão ao MongoDB:'));
db.once('open', () => {
  console.log('Conectado ao MongoDB');
});

// Definir modelo de tarefa
const taskSchema = new mongoose.Schema({
  description: String,
  completed: { type: Boolean, default: false },
});

const Task = mongoose.model('Task', taskSchema);

// Rotas
app.get('/tasks', async (req, res) => {
  try {
    const tasks = await Task.find();
    res.json(tasks);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
});

app.post('/tasks', async (req, res) => {
  const task = new Task({
    description: req.body.description,
  });

  try {
    const newTask = await task.save();
    res.status(201).json(newTask);
  } catch (error) {
    res.status(400).json({ message: error.message });
  }
});

// Iniciar o servidor
const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`Servidor rodando na porta ${port}`);
});
=======
let teste = {
    '1':1,
    '2':2
}
console.log(teste)

Object.keys(teste).forEach(key => delete teste[key]);
    console.log('teste')

console.log(teste)
>>>>>>> 69804ac3e691c17962d8ac358669fe143a84e433
