<?php
namespace App\Entity;

class Player
{
    private const PLAY_PLAY_STATUS = 'play';
    private const BENCH_PLAY_STATUS = 'bench';

    private int $number;
    private string $name;
    private string $playStatus;
    private int $inMinute;
    private int $outMinute;
    private bool $goalStatus;
    private bool $yellowCardStatus;
    private bool $redCardStatus;
    private string $position;


    public function __construct(int $number, string $name, string $position)
    {
        $this->number = $number;
        $this->name = $name;
        $this->playStatus = self::BENCH_PLAY_STATUS;
        $this->inMinute = 0;
        $this->outMinute = 0;
        $this->goalStatus = false;
        $this->yellowCardStatus = false;
        $this->redCardStatus = false;
        $this->position = $position;


    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getInMinute(): int
    {
        return $this->inMinute;
    }

    public function getOutMinute(): int
    {
        return $this->outMinute;
    }

    public function isPlay(): bool
    {
        return $this->playStatus === self::PLAY_PLAY_STATUS;
    }

    public function isGoal(): void
    {
         $this->goalStatus = true; //присвоить переменной значение истины
    }

    public function isYellowCard(): void
    {
         $this->yellowCardStatus = true; //присвоить переменной  значение истины
    }

    public function isRedCard(): void
    {
         $this->redCardStatus = true; //присвоить переменной  значение истины
    }

    public function getPlayTime(): int
    {
        if(!$this->outMinute) {
            return 0;
        }

        return $this->outMinute - $this->inMinute + 1; // Добавляем 1 минуту, потому что периоды начинаются в логах с 1 и 46 минуты. Т.е время до 00.59 - это первая минута, а по факту игрок сыграл 0 минут и сколько то секунд. Также эта минута будет добавлятся если игрок вышел на поле в качестве запасного, потому что эта минута опять же сдвигается. ;
    }

    public function getGoal(): bool
    {
        return $this->goalStatus;   // Получаем статус забитого гола у игрока
    }

    public function getYellowCard(): bool
    {
        return $this->yellowCardStatus;   // Получаем статус желтой карточки у игрока
    }

    public function getRedCard(): bool
    {
        return $this->redCardStatus;   // Получаем статус красной карточки у игрока
    }

    public function goToPlay(int $minute): void
    {
        $this->inMinute = $minute;
        $this->playStatus = self::PLAY_PLAY_STATUS;
    }

    public function goToBench(int $minute): void
    {
        $this->outMinute = $minute;
        $this->playStatus = self::BENCH_PLAY_STATUS;
    }
}