#import <Foundation/Foundation.h>
#import <Accelerate/Accelerate.h>

int main(int argc, const char * argv[]) {
    @autoreleasepool {
        // Define beam properties
        double length = 1.0; // Length of the beam
        double density = 7850.0; // Density of the beam material
        double modulus = 2.1e11; // Young's modulus of the beam material
        double momentOfInertia = 1.0; // Moment of inertia of the beam cross-section

        // Define number of modes to calculate
        int numModes = 3;

        // Calculate natural frequencies and mode shapes
        double frequencies[numModes];
        double modeShapes[numModes][numModes];


        // Set up the eigenvalue problem
        double massMatrix[numModes][numModes];
        double stiffnessMatrix[numModes][numModes];

        // Populate the mass and stiffness matrices
        for (int i = 0; i < numModes; i++) {
            for (int j = 0; j < numModes; j++) {
                if (i == j) {
                    massMatrix[i][j] = density * length / (12.0 * (i + 1));
                    stiffnessMatrix[i][j] = modulus * momentOfInertia * pow(M_PI * (i + 1) / length, 4);
                } else {
                    massMatrix[i][j] = 0.0;
                    stiffnessMatrix[i][j] = 0.0;
                }
            }
        }

        // Solve the eigenvalue problem
        vDSP_DSYEVD(&massMatrix[0][0], &stiffnessMatrix[0][0], frequencies, modeShapes[0], numModes);

        // Print the results
        for (int i = 0; i < numModes; i++) {
            printf("Mode %d: Frequency = %f Hz\n", i + 1, sqrt(frequencies[i]) / (2.0 * M_PI));
            printf("Mode %d: Mode Shape = [", i + 1);
            for (int j = 0; j < numModes; j++) {
                printf("%f ", modeShapes[i][j]);
            }
            printf("]\n");
        }
    }
    return 0;
}
