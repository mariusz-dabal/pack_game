import React, {useEffect, useState} from 'react';
import Container from '@mui/material/Container';
import Typography from '@mui/material/Typography';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import axios from 'axios';

function createData(name, calories, fat, carbs, protein) {
  return { name, calories, fat, carbs, protein };
}

const rows = [
  createData('Frozen yoghurt', 159, 6.0, 24, 4.0),
  createData('Ice cream sandwich', 237, 9.0, 37, 4.3),
  createData('Eclair', 262, 16.0, 24, 6.0),
  createData('Cupcake', 305, 3.7, 67, 4.3),
  createData('Gingerbread', 356, 16.0, 49, 3.9),
];

// function getPlayers() {
//   axios.get(`https://localhost/api/players`).then(players => {
//
//   })
// }

export default function Home() {
  const [players, setPlayers] = useState([]);

  useEffect(() => {
    axios.get(`https://localhost/api/players`).then(res => {
      setPlayers(res.data);
      console.log(players);
    })
  }, [])

  return (
    <Container maxWidth={"xl"}>
      <Typography variant="h1"
                  component="h2"
                  align="center"
                  gutterBottom={true}
                  className="title"
      >
        Światowy ranking gry w paczkę
      </Typography>

      <TableContainer component={Paper} className="table">
        <Table sx={{ minWidth: 650 }} aria-label="simple table">
          <TableHead>
            <TableRow>
              <TableCell>Gracz</TableCell>
              <TableCell align="right">Punkty</TableCell>
              <TableCell align="right">Zwycięstwa</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            {players.map((row) => (
              <TableRow
                key={row.name}
                sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
              >
                <TableCell component="th" scope="row">
                  {row.name}
                </TableCell>
                <TableCell align="right">{row.points}</TableCell>
                <TableCell align="right">{row.wins}</TableCell>
              </TableRow>
            ))}
          </TableBody>
        </Table>
      </TableContainer>
    </Container>
  );
}
