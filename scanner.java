package java_proj;

import java.util.*;

public class scanner {

	public static void getUserInput() {
		Scanner sc = new Scanner(System.in);
		int answer = 0;
		if (answer > 0) {
			int count = 100;

			for (int i = 0; i < count; i++) {
				try {
					System.out.println("Please type in a whole number: ");
					answer = sc.nextInt();
				} catch (InputMismatchException e) {
					System.out.print("Error - Please try again");
					System.out.println("Please type in a whole number: ");
					answer = sc.nextInt();
				}
			}
		}
	}
}
