#include <iostream>
#include <cstdlib>
#include <ctime>

int main() {
    // Seed for the random number generator
    std::srand(static_cast<unsigned int>(std::time(nullptr)));

    // Generate a random number between 1 and 100
    int secretNumber = std::rand() % 100 + 1;

    int guess;
    int attempts = 0;

    std::cout << "Welcome to the Guess the Number game!\n";
    std::cout << "Try to guess the number between 1 and 100.\n\n";

    do {
        // Get player's guess
        std::cout << "Enter your guess: ";
        std::cin >> guess;

        // Increment the number of attempts
        attempts++;

        // Check if the guess is correct
        if (guess == secretNumber) {
            std::cout << "Congratulations! You guessed the correct number in " << attempts << " attempts.\n";
        } else if (guess < secretNumber) {
            std::cout << "Too low! Try again.\n";
        } else {
            std::cout << "Too high! Try again.\n";
        }

    } while (guess != secretNumber);

    return 0;
}
