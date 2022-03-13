[![ci](https://github.com/ahmad-azizi-dev/slot-machine/actions/workflows/ci.yml/badge.svg)](https://github.com/ahmad-azizi-dev/slot-machine/actions/workflows/ci.yml)

# Slot Machine
This is a very simple simulated slot machine.


### Requirement

---

- docker
- docker compose
- make

### Run

---

### For **run** use this command:

`make run`

You should see a JSON output similar to:
```json
{
  "board": [
    "9",
    "10",
    "10",
    "K",
    "9",
    "10",
    "10",
    "10",
    "cat",
    "10",
    "9",
    "9",
    "9",
    "dog",
    "monkey"
  ],
  "paylines": [
    {
      "1 4 7 10 13": 3
    },
    {
      "2 5 8 11 14": 3
    }
  ],
  "bet_amount": 100,
  "total_win": 40
}
```
### For running **tests** use this command

`make test`

You should see this output similar to:
```shell
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

.........                                                           9 / 9 (100%)

Time: 53 ms, Memory: 6.00MB

OK (9 tests, 20 assertions)
```
### For SSH into the running container use this command

`make run_container`